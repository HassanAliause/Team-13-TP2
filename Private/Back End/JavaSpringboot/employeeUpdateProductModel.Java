public class Product {
    private int id;
    private String name;
    private String description;
    private double price;
    private int quantity;
    private double total;
    private int keyValue;
    private String imageFile;

    public Product() {
    }

    public Product(int id, String name, String description, double price, int quantity, double total, int keyValue, String imageFile) {
        this.id = id;
        this.name = name;
        this.description = description;
        this.price = price;
        this.quantity = quantity;
        this.total = total;
        this.keyValue = keyValue;
        this.imageFile = imageFile;
    }

    // getters and setters
    // ...
}
