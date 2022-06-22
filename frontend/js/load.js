import config from "./conf.js"

export default async function load(old_id) {
    try {
        const res = await fetch(`${config.backendUrl}/_get_next.php?id=${old_id}`)
        const slide = await res.json()
        if (slide.file === "no active file") throw new Error("no active file")
        slide.file = `${config.backendUrl}/${slide.file}`
        return slide
    } catch (err) {
        return { file: "background.png", duration: config.timeout, error: err }
    }
}
