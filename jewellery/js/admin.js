
                 // food category

let foodMenuList = document.querySelector('.food-item-wrap')

let foodCategory = document.querySelector('.food-category')

let categories = foodCategory.querySelectorAll('button')

Array.from(categories).forEach((item, index) => {
    item.onclick = (e) => {
        let currCat = foodCategory.querySelector('button.active')
        // currCat.classList.remove('active')
        e.target.classList.add('active')
        currCat.classList.remove('active')
        // foodMenuList.classList ='food-item-wrap '+ e.target.getAttribute('data-food-type')
        foodMenuList.classList ='food-item-wrap '+ e.target.getAttribute('data-food-type')

    }
})


