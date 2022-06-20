import { sleep } from "./util.js"
import config from "./conf.js"
import load from "./load.js"
const display = document.querySelector("main")

let slide = {}
async function main() {
    slide = await load(slide.id)
    display.style.backgroundImage = `url(${config.backendUrl}/${slide.file})`
    console.log(display.style.backgroundImage)
    setTimeout(main, slide.duration * 1000)
}

main()
