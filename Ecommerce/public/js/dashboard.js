
// Add smooth scroll and active menu handling
document.querySelectorAll('.menu-item').forEach(item => {
    item.addEventListener('click', function (e) {
        document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
    });
});


const userMenuButton = document.getElementById('userMenuButton');
const userDropdownMenu = document.getElementById('userDropdownMenu');

if (userMenuButton && userDropdownMenu) {

    userMenuButton.addEventListener('click', function (e) {
        e.stopPropagation();
        userDropdownMenu.classList.toggle('show');
    });


    document.addEventListener('click', function (e) {
        if (!userMenuButton.contains(e.target) && !userDropdownMenu.contains(e.target)) {
            userDropdownMenu.classList.remove('show');
        }
    });


    userDropdownMenu.addEventListener('click', function (e) {
        e.stopPropagation();
    });
}
