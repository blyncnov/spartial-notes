import "./bootstrap";

const elementTest = document.getElementsByTagName("p");

console.log("hello boss");
console.log(elementTest);

Alpine.data("dropdown", () => ({
    open: false,

    toggle() {
        this.open = !this.open;
    },
}));
