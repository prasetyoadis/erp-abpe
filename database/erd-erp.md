---
config:
  layout: elk
---
erDiagram

    USERS {
        uuid id PK
        ulid role_id FK
        string name
        string email
        string msisdn
        string password
        boolean is_active
        timestamp email_verified_at
        string remember_token
        timestamp created_at
        timestamp updated_at
    }

    ROLES {
        ulid id PK
        string name
        string slug
        string description
        timestamp created_at
        timestamp updated_at
    }

    DEPARTEMENTS {
        ulid id PK
        string name
        uuid manager_id FK
        timestamp created_at
        timestamp updated_at
    }

    EMPLOYEES {
        ulid id PK
        string employee_code
        string name
        ulid departement_id FK
        string position
        enum employment_type
        date join_date
        bigint salary
        enum status
        timestamp deleted_at
        timestamp created_at
        timestamp updated_at
    }

    CUSTOMERS {
        uuid id PK
        string name
        string email
        string msisdn
        string address
        string city
        bigint credit_limit
        string payment_terms
        boolean is_active
        timestamp created_at
        timestamp updated_at
    }

    SUPPLIERS {
        uuid id PK
        string supplier_code
        string name
        string email
        string msisdn
        string address
        string city
        string payment_terms
        enum status
        timestamp created_at
        timestamp updated_at
    }

    CATEGORIES {
        ulid id PK
        string name
        string slug
        timestamp created_at
        timestamp updated_at
    }

    PRODUCTS {
        ulid id PK
        ulid category_id FK
        string sku
        string name
        string unit
        bigint selling_price
        bigint cost_price
        int minimum_stock
        boolean is_active
        timestamp deleted_at
        timestamp created_at
        timestamp updated_at
    }

    MATERIALS {
        ulid id PK
        string material_code
        string name
        string unit
        bigint cost_price
        int current_stock
        int minimum_stock
        boolean is_active
        timestamp deleted_at
        timestamp created_at
        timestamp updated_at
    }

    MACHINES {
        ulid id PK
        string machine_code
        string name
        string location
        int capacity_per_day
        enum status
        timestamp deleted_at
        timestamp created_at
        timestamp updated_at
    }

    SALES_ORDERS {
        ulid id PK
        string order_num
        uuid customer_id FK
        enum status
        enum payment_status
        bigint subtotal
        bigint tax_amount
        bigint total_amount
        text note
        uuid created_by FK
        timestamp created_at
        timestamp updated_at
    }

    SALES_ORDER_ITEMS {
        ulid id PK
        ulid sales_order_id FK
        ulid product_id FK
        int quantity
        bigint unit_price
        bigint total_price
        timestamp created_at
        timestamp updated_at
    }

    SHIPMENTS {
        ulid id PK
        string shipment_number
        ulid sales_order_id FK
        enum status
        text note
        timestamp created_at
        timestamp updated_at
    }

    PURCHASE_ORDERS {
        ulid id PK
        string po_number
        uuid supplier_id FK
        enum status
        bigint subtotal
        bigint tax_amount
        bigint total_amount
        text note
        uuid created_by FK
        timestamp created_at
        timestamp updated_at
    }

    PURCHASE_ORDER_ITEMS {
        ulid id PK
        ulid purchase_order_id FK
        ulid material_id FK
        int quantity
        bigint unit_price
        bigint total_price
        timestamp created_at
        timestamp updated_at
    }

    WORK_ORDERS {
        ulid id PK
        string wo_number
        ulid product_id FK
        ulid machine_id FK
        int planned_quantity
        int produced_quantity
        enum status
        text note
        timestamp created_at
        timestamp updated_at
    }

    WORK_ORDER_MATERIALS {
        ulid id PK
        ulid work_order_id FK
        ulid material_id FK
        int planned_qty
        int actual_qty
        timestamp created_at
        timestamp updated_at
    }

    QC_RECORDS {
        ulid id PK
        ulid work_order_id FK
        ulid inspector_id FK
        enum status
        int inspected_quantity
        text note
        date inspection_date
        timestamp created_at
        timestamp updated_at
    }

    WAREHOUSES {
        ulid id PK
        string code
        string name
        string location
        boolean is_active
        timestamp created_at
        timestamp updated_at
    }

    STOCKS {
        ulid id PK
        ulid warehouse_id FK
        ulid item_id
        string item_type
        int quantity
        timestamp created_at
        timestamp updated_at
    }

    STOCK_MOVEMENTS {
        ulid id PK
        ulid warehouse_id FK
        ulid reference_id
        string reference_type
        ulid item_id
        string item_type
        enum movement_type
        int quantity
        bigint unit_cost
        bigint total_cost
        text note
        timestamp created_at
        timestamp updated_at
    }

    ROLES ||--o{ USERS : has
    USERS ||--o{ SALES_ORDERS : creates
    USERS ||--o{ PURCHASE_ORDERS : creates
    USERS ||--o{ DEPARTEMENTS : manages

    DEPARTEMENTS ||--o{ EMPLOYEES : has

    CUSTOMERS ||--o{ SALES_ORDERS : places
    SALES_ORDERS ||--o{ SALES_ORDER_ITEMS : contains
    SALES_ORDERS ||--o{ SHIPMENTS : ships
    PRODUCTS ||--o{ SALES_ORDER_ITEMS : sold

    SUPPLIERS ||--o{ PURCHASE_ORDERS : supplies
    PURCHASE_ORDERS ||--o{ PURCHASE_ORDER_ITEMS : contains
    MATERIALS ||--o{ PURCHASE_ORDER_ITEMS : purchased

    CATEGORIES ||--o{ PRODUCTS : groups

    PRODUCTS ||--o{ WORK_ORDERS : produced
    MACHINES ||--o{ WORK_ORDERS : runs
    WORK_ORDERS ||--o{ WORK_ORDER_MATERIALS : consumes
    MATERIALS ||--o{ WORK_ORDER_MATERIALS : used_in

    WORK_ORDERS ||--o{ QC_RECORDS : inspected
    EMPLOYEES ||--o{ QC_RECORDS : inspector

    WAREHOUSES ||--o{ STOCKS : stores
    WAREHOUSES ||--o{ STOCK_MOVEMENTS : records
    PRODUCTS ||--o{ STOCKS : morph_item
    MATERIALS ||--o{ STOCKS : morph_item

    PRODUCTS ||--o{ STOCK_MOVEMENTS : morph_item
    MATERIALS ||--o{ STOCK_MOVEMENTS : morph_item
    SALES_ORDERS ||--o{ STOCK_MOVEMENTS : morph_reference
    PURCHASE_ORDERS ||--o{ STOCK_MOVEMENTS : morph_reference
    WORK_ORDERS ||--o{ STOCK_MOVEMENTS : morph_reference