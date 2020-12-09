</div>

<div class="themetoggle social-icons">
    <a class="social-icon" onclick="toggleDark();">
        <i class="fas fa-moon" id="theme-toggle"></i>
    </a>
</div>

<noscript>
<style>
.themetoggle {
    display: none;
}
</style>
</noscript>
<script>
function toggleDark() {
    for (let tag of ["a", "body", "h1", "h2", "h3"]) {
        for (let item of document.getElementsByTagName(tag)) { 			 		
            item.classList.toggle("darktheme"); 
        }
    }
    let toggle = document.getElementById("theme-toggle");
    if (toggle.classList[1] == "fa-moon") {
        toggle.classList.replace("fa-moon", "fa-sun");
    } else {
        toggle.classList.replace("fa-sun", "fa-moon");
    }
}
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    toggleDark();
}

</script>