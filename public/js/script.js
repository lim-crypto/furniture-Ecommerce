/**
 * Sidebar DOM
 */
let path = window.location.pathname;
const getActive = document.querySelectorAll('.active');
const dashboardPath = document.querySelector('#dashboard-link').pathname;
const categoryPath = document.querySelector('#category-link').pathname;
const productsPath = document.querySelector('#products-link').pathname;
const ordersPath = document.querySelector('#orders-link').pathname;
const usersPath = document.querySelector('#users-link').pathname;

/**
 * FUNCTIONS
 */
// To change the active navigation link in side bar
window.onload = () => {
    switch (path) {
        case dashboardPath:
            document.querySelector('#dashboard-link').classList.add('active');
            break;
        case categoryPath:
            document.querySelector('#category-link').classList.add('active');
            break;

        case productsPath:
            document.querySelector('#products-link').classList.add('active');
            break;

        case ordersPath:
            document.querySelector('#orders-link').classList.add('active');
            break;
        case usersPath:
            document.querySelector('#users-link').classList.add('active');
            break;

        default:
            break;
    }
}