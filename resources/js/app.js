import "./bootstrap";

var searchInput = document.querySelector('input[name="search_input"]');

console.log("hello boss");

document.addEventListener("DOMContentLoaded", function () {
    var autocomplete = new google.maps.places.Autocomplete(searchInput, {
        types: ["geocode"],
        componentRestrictions: { country: "US" },
    });

    autocomplete.addListener("place_changed", function () {
        var near_place = autocomplete.getPlace();
    });
});
