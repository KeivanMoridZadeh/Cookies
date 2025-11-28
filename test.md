
erDiagram
    USERS {
        int id PK
        string first_name
        string last_name
        string email
        string password
        boolean is_admin
    }
    
    PRODUCTS {
        int id PK
        string name
        string type
        decimal price
        json ingredients
        int user_id FK
    }
    
    CARTS {
        int id PK
        int user_id FK
    }
    
    CARTS_PRODUCT {
        int cart_id PK_FK
        int product_id PK_FK
        int quantity
    }
    
    USERS ||--o{ PRODUCTS : creates
    USERS ||--o| CARTS : owns
    CARTS ||--o{ CARTS_PRODUCT : contains
    PRODUCTS ||--o{ CARTS_PRODUCT : "in cart"
