--Get Products and Images of Products
SELECT product.id, product.name, product.price, image.src
FROM product
INNER JOIN image ON product.id = image.product_id
WHERE image.description = 0



--Get order products
select DISTINCT product_id from `order_product`
GROUP BY product_id
ORDER BY count(product_id) DESC
LIMIT 6



select
  DISTINCT order_product.product_id,
  product.name ,
  product.price,
  image.src
from `order_product`
  INNER JOIN product ON product.id = order_product.product_id
  INNER JOIN image ON image.product_id = order_product.product_id
WHERE image.description = 0
GROUP BY order_product.product_id, product.name, product.price, image.src
ORDER BY count(order_product.product_id) DESC
LIMIT 6