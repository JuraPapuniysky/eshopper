<?php
namespace frontend\controllers;

use backend\models\Image;
use backend\models\Cart;
use backend\models\Order;
use backend\models\OrderProduct;
use backend\models\Product;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Brand;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($category_id = null, $section_id = null, $brand_id = null)
    {
       return $this->render('index',[
           'category_id' => $category_id,
           'section_id' => $section_id,
           'brand_id' => $brand_id,
       ]);
    }



    /**
     * Opens a user cart
     * @return string
     */
    public function actionCart($id = null, $action = null)
    {

        if($action != null && $id != null)
        {
            Cart::action($id, $action);
            return $this->redirect('/site/cart/');
        }else{
        return $this->render('cart', [
            'products' => Cart::getCartProduct(),
            'total_price' => Cart::$total_price,
        ]);
    }
    }

    public function actionOrder($id = null)
    {
        $modelCart = new Cart();
        $model = new Order();
        if($modelCart->load(Yii::$app->request->post()))
        {
            $modelCart->product_id = $id;
            $modelCart->add();
            if($modelCart->save())
            {

                return $this->render('order_form', [
                    'model' => $model,
                ]);

            }else{
                return $this->redirect('site/index');
            }
        }
    }

    public function actionOrderForm()
    {
        $order = new Order();
        
        $order_number = Yii::$app->session->get('user_token');
        $order->order_number = (string)$order_number;
        $order->status = 0;
        if($order->load(Yii::$app->request->post()) && $order->validate()){

            if($order->save()) {
                
                $order->add($order_number);

                return $this->render('order_success', [
                    'order_number' => $order_number,
                ]);
            }
        }else{
            return $this->render('order_form', [
                'model' => $order,
            ]);
        }
    }

    /**
     * Opens a product details
     * @param $id
     * @param null $imageId
     * @return string
     */
    public function actionProductDetails($id, $imageId = null)
    {
        $product = Product::findProductById($id);
        $image = $product->getMainImage($imageId);
        $brand = $product->getBrand();

        $modelCart = new Cart();


        if($modelCart->load(Yii::$app->request->post()))
        {
            $modelCart->product_id = $id;
            $modelCart->add();
            if($modelCart->save())
            {
                Yii::$app->session->setFlash('success','Товар добавлен в корзину!');
            }
        }
        return $this->render('product_details', [
            'product' => $product,
            'images' => $product->getImagesGroup(),
            'image' => $image,
            'brand' => $brand,
            'size' => $product->getSizes()->all(),
            'modelCart' => $modelCart,
        ]);
    }

    /**
     * @param $currency
     */
    public function actionChangeCarrency($currency)
    {
        $session = Yii::$app->session;
        if($session->has('currency')){
           $session->set('currency', $currency);
        }
        $this->redirect('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
