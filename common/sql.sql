--Get Products and Images of Products
SELECT product.id, product.name, product.price, image.src
FROM product
INNER JOIN image ON product.id = image.product_id
WHERE image.description = 0