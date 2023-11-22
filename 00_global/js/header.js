const header = document.getElementById("header")
const header_menu_button = document.getElementById("header_menu_button")
const header_mobile_menu = document.getElementById("header_mobile_menu")
header_mobile_menu.style.maxHeight = "0px"

header_menu_button.addEventListener('pointerdown', () => {
        if
        (
            header_mobile_menu.style.maxHeight == "0px"
        )
        {
            header_mobile_menu.style.maxHeight = "300px"
            header_mobile_menu.style.padding = "15px 25px 25px 25px"
            header_menu_button.style.transform = "rotate(90deg)"
        }
        else
        {
            header_mobile_menu.style.maxHeight = "0px"
            header_mobile_menu.style.padding = "0px 25px 0 25px"
            header_menu_button.style.transform = "rotate(0deg)"
        }
    }
)


const move_to_top = document.getElementById("move_to_top")
const move_to_bottom = document.getElementById("move_to_bottom")

move_to_top.addEventListener("pointerdown", () => {
    header.scrollIntoView()
})
move_to_bottom.addEventListener("pointerdown", () => {
    footer.scrollIntoView()
})
