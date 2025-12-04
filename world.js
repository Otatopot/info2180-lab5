document.addEventListener('DOMContentLoaded', () => {
    var httpRequest = new  XMLHttpRequest();
    //makes this the url of website.
    //remove the jamaica later and add the entered query to the url later
    let url = "http://localhost/info2180_code/info2180-lab5/world.php?country=";
    let searchButtons = document.querySelectorAll("button"); 
    //let search = document.getElementById("lookup");
    let result = document.getElementById("result");

    function showCountries() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                let response = httpRequest.responseText;
                result.innerHTML = response;
            } 
            else {
                alert('There was a problem with the request.');
            }
        }
    }

    searchButtons.forEach(function(search) {
        search.addEventListener("click", function(event) {
            event.preventDefault();
            var input_tag = document.querySelector('#country');
            var country = input_tag.value.trim();
            var lookup = event.target.id;
            console.log(country);

            httpRequest.onreadystatechange = showCountries;
            httpRequest.open('GET', url + country + "& lookup=" + lookup, true);
            httpRequest.send();
        })
    })

})