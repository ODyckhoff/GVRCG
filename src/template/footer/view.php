</div>
<div class="w3-dark-grey w3-center w3-text-white w3-small w3-margin-top footer">
&copy; 2017 Bridgend Valleys Railway Company t/a Garw Valley Railway | Pontycymer Locomotive Works, Old Station Yard, Pontycymer, Bridgend CF32 8AZ
<br />
Registered Charity 1113983 - Company Number 02897214
<br />
</div>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction(selector) {
    var x = document.getElementById(selector);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
       /* if(selector == "service") {
            x.className += " w3-margin-left";
        }*/
    } else {
        x.className = x.className.replace(" w3-show", "w3-hide");
        /*if(selector == "service") {
            x.className = x.className.replace(" w3-margin-left", "");
        }*/
    }
}

// Used to reveal the email address on the contact us page to help prevent bots from being a pain.
function reveal() {
    var base64email = "aW5mb0BicmlkZ2VuZHBjYy5vcmc=";
    var btn = document.getElementById("ereveal");

    btn.innerHTML = atob(base64email);
}
</script>

