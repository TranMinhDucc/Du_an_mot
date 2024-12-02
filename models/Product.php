<?php
require_once '../connect/connect.php';
class product extends connect
{
    public function getAllCategory()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function topPrdViewCount(){
        $sql = "SELECT * FROM products ORDER BY view_count DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllVariant()
    {
        $sql = "SELECT * FROM variant_weights";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $description, $prices, $cost_price, $sale, $image, $view_count, $status, $catrgories_id, $slug)
    {
        $sql = 'INSERT INTO products(name,description,prices,cost_price,sale,images,view_count,status,catrgories_id,slug) values(?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $description, $prices, $cost_price, $sale, $image, $view_count, $status, $catrgories_id, $slug]);
    }

    public function addProductVariant($price, $sale_price, $variant_weight_id, $product_id)
    {
        $sql = 'INSERT INTO products_variants(price, sale_price, variant_weight_id, product_id, created_at, updated_at)
        VALUES (?, ?, ?, ?, NOW(), NOW())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $variant_weight_id, $product_id]);
    }

    public function getLastInsert()
    {
        return $this->connect()->lastInsertId();
    }

    public function listProduct()
    {
        $sql = "SELECT 
                    products.id AS product_id, 
                    products.name AS product_name, 
                    products.prices AS product_price, 
                    products.sale AS product_sale_price, 
                    products.images AS product_image,
                    products.slug AS product_slug,
                    products.status AS product_status, 
                    categories.id AS category_id, 
                    categories.name AS category_name,
                    products_variants.id AS product_variant_id,
                    variant_weights.weight AS product_variant_weight
                FROM products 
                LEFT JOIN categories ON products.catrgories_id = categories.id
                LEFT JOIN products_variants ON products.id = products_variants.product_id
                LEFT JOIN variant_weights ON products_variants.variant_weight_id = variant_weights.id

                ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $groupedProduct = [];

        // Lặp qua từng sản phẩm trong danh sách product
        foreach ($listProduct as $product) {
            if (!isset($groupedProduct[$product['product_id']])) {
                $groupedProduct[$product['product_id']] = $product;
                $groupedProduct[$product['product_id']]['variants'] = [];
            }
            $groupedProduct[$product['product_id']]['variants'][] = [
                'product_id' => $product['product_id'],
                'product_variant_weight' => $product['product_variant_weight'],
            ];
        }
        return $groupedProduct;
    }
    public function listProductHome()
    {
        $sql = "SELECT 
                    products.id AS product_id, 
                    products.name AS product_name, 
                    products.prices AS product_price, 
                    products.sale AS product_sale_price, 
                    products.images AS product_image,
                    products.slug AS product_slug,
                    products.status AS product_status, 
                    categories.id AS category_id, 
                    categories.name AS category_name,
                    products_variants.id AS product_variant_id,
                    variant_weights.weight AS product_variant_weight
                FROM products 
                LEFT JOIN categories ON products.catrgories_id = categories.id
                LEFT JOIN products_variants ON products.id = products_variants.product_id
                LEFT JOIN variant_weights ON products_variants.variant_weight_id = variant_weights.id
                WHERE products.status = 'active'  
                ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $listProductHome = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $groupedProduct = [];

        // Lặp qua từng sản phẩm trong danh sách product
        foreach ($listProductHome as $product) {
            if (!isset($groupedProduct[$product['product_id']])) {
                $groupedProduct[$product['product_id']] = $product;
                $groupedProduct[$product['product_id']]['variants'] = [];
            }
            $groupedProduct[$product['product_id']]['variants'][] = [
                'product_id' => $product['product_id'],
                'product_variant_weight' => $product['product_variant_weight'],
            ];
        }
        return $groupedProduct;
    }


    public function getProductById($product_id)
    {
        $sql = 'SELECT 
                    products.id AS product_id, 
                    products.name AS product_name, 
                    products.prices AS product_price, 
                    products.sale AS product_sale_price, 
                    products.images AS product_image, 
                    products.description AS product_description, 
                    products.status AS product_status, 
                    products.cost_price AS product_cost_price, 
                    products.view_count AS product_view_count, 
                    products.slug AS product_slug, 
                    categories.id AS category_id, 
                    categories.name AS category_name
            FROM products
            LEFT JOIN categories ON products.catrgories_id = categories.id
            WHERE products.id = ?';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductVariantById($product_id)
    {
        $sql = 'SELECT 
                    products_variants.id AS product_id, 
                    products_variants.price AS variant_price, 
                    products_variants.sale_price AS variant_sale_price, 
                    variant_weights.id AS variant_weight_id, 
                    variant_weights.weight AS variant_weight_name
            FROM products_variants
            LEFT JOIN variant_weights ON products_variants.variant_weight_id = variant_weights.id
            WHERE products_variants.product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $description, $prices, $cost_price, $sale, $image, $view_count, $status, $catrgories_id, $slug)
    {
        $sql = 'UPDATE products SET name=?, description=?, prices=?, cost_price=?, sale=?, images=?, view_count=?, status=?, catrgories_id=?, slug=? where id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $description, $prices, $cost_price, $sale, $image, $view_count, $status, $catrgories_id, $slug, $id]);
    }

    public function updateProductVariant($id, $price, $sale_price, $variant_weight_id, $product_id)
    {
        $sql = 'UPDATE products_variants SET price=?, sale_price=?, variant_weight_id=?, product_id=? WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $variant_weight_id, $product_id, $id]);
    }


    public function removeProductVariant() {
        $sql = 'DELETE FROM products_variants WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }

    public function removeProduct()
    {
        $sql = 'DELETE FROM products WHERE id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }

    function viewCount($slug){
        $sql = 'UPDATE products SET view_count = view_count + 1 WHERE slug = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$slug]);
    }

    public function getProductBySlug($slug)
    {
        $sql = 'SELECT
        
         products.id AS product_id, 
                    products.name AS product_name, 
                    products.prices AS product_price, 
                    products.sale AS product_sale_price, 
                    products.images AS product_image, 
                    products.status AS product_status, 
                    products.slug AS product_slug,
                    products.description AS product_description,
                    categories.id AS category_id, 
                    categories.name AS category_name,
                    products_variants.id AS product_variant_id,
                    products_variants.price AS variant_price,
                    products_variants.variant_weight_id AS variant_weight_id,
                    products_variants.sale_price AS variant_sale_price,
                    variant_weights.id AS product_variant_id,
                    variant_weights.weight AS product_variant_weight
        FROM products
        LEFT JOIN categories ON products.catrgories_id = categories.id
        LEFT JOIN products_variants ON products.id = products_variants.product_id
        LEFT JOIN variant_weights ON products_variants.variant_weight_id = variant_weights.id
        WHERE products.slug = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$slug]);
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $groupedProduct = [];

        // Lặp qua từng sản phẩm trong danh sách product
        foreach ($listProduct as $product) {
            // Nếu sản phẩm chưa tồn tại thì mới thêm vào
            if (!isset($groupedProduct[$product['product_id']])) {
                $groupedProduct[$product['product_id']] = $product;
                $groupedProduct[$product['product_id']]['variants'] = [];
            }
            //Kiểm tra biến thể đã có trong mảng chưa
            $exist = false;
            foreach ($groupedProduct[$product['product_id']]['variants'] as $variant) {

                if (
                    $variant['product_variant_id'] == $product['product_variant_id'] &&
                    $variant['variant_sale_price'] == $product['variant_sale_price']
                ) {
                    $exist = true;
                    break;
                }
            }
            if (!$exist) {
                $groupedProduct[$product['product_id']]['variants'][] = [
                    'product_variant_id' => $product['product_variant_id'],
                    'variant_sale_price' => $product['variant_sale_price'],
                    'product_variant_weight' => $product['product_variant_weight']

                ];
            }
        }
        return $groupedProduct;
    }

    public function checkProductName($name){
        $sql = 'SELECT * FROM products WHERE email=? LIMIT 1';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->fetch();
    }
}
