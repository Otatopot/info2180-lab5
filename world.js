document.addEventListener('DOMContentLoaded', () => {
    var httpRequest = new  XMLHttpRequest();
    //makes this the url of website.
    //remove the jamaica later and add the entered query to the url later
    let url = "http://localhost/info2180_code/info2180-lab5/world.php?country="; 
    let search = document.getElementById("lookup");
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

    search.addEventListener("click", function(event) {
        event.preventDefault();
        var input_tag = document.querySelector('#country');
        var query = input_tag.value.trim()
        console.log(query);

        httpRequest.onreadystatechange = showCountries;
        httpRequest.open('GET', url + query, true);
        httpRequest.send();
    })

})