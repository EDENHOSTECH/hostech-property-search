const propertyForm = document.querySelector('#propertyForm');
const titleInput = document.querySelector('#titleInput');
const priceInput = document.querySelector('#priceInput');
const statusInput = document.querySelector('#statusInput');
const searchProperty = document.querySelector('#searchProperty');
const message = document.querySelector('#message');
const results = document.querySelector('#results');

propertyForm.addEventListener('submit', async function(event)
{
    
    event.preventDefault();
    const url = buildSearchUrl();
    message.textContent = "Searching properties......";
    results.replaceChildren();
    

    try{
        const data = await fetchProperties(url);
        if(data.success !== true){
            throw new Error(data.message || "Unable to search properties.");
        }

        displayProperties(data.properties);
    }
    catch(error){
        console.error("Search failed: ", error.message);
    }
    

});

// This function teaches how to separate form input handling
// from the API request by building a reusable search URL.

function buildSearchUrl() {
    // TODO 1: Read the title and maximum price.
    // Remember to trim the title.
    const title = titleInput.value.trim();
    const price = priceInput.value;
    const status = statusInput.value;


    // TODO 2: Create a URLSearchParams object.
    const params = new URLSearchParams();
    
    // TODO 3: Add each non-empty input to the parameters,
    // then return the complete API URL.
    if(title !== ""){
        params.set("title", title);
    }
    if(price !==""){
        params.set("price", price);
    }
    if(status !== ""){
        params.set("status", status);
    }

    if(params.toString() === "")
    {
        return "search_api.php";
    }

    return "search_api.php?" + params.toString();
}

async function fetchProperties(url) {
    try{
        const response = await fetch(url);

        if(!response.ok){
            throw new Error("Failed to fetch properties.");
        }

        const data = await response.json();

        return data;
    }
    catch(error)
    {
        console.error("Error fetching properties: ", error.message);
        throw error;
    }
}

function displayProperties(properties){
    results.replaceChildren();

    if(properties.length === 0){
        message.textContent = "No matching properties found";
        return;
    }

    message.textContent = `${properties.length} propert${properties.length === 1 ? "y" : "ies"} found`;
    properties.forEach(function(property) {
        const card = document.createElement("div");
        card.className = "propert-card";

        const title = document.createElement("h3");
        title.textContent = property.title;

        const price = document.createElement("p");
        price.textContent = "Price: ₦" + Number(property.price).toLocaleString("en-NG");

        const status = document.createElement("p");
        status.textContent = property.status;

        card.append(title, price, status);
        results.appendChild(card);
    });

}
