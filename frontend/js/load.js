import config from "./conf.js"

export default async function load(old_id) {
    try {
        console.log("Trying to get next from " + old_id)
        const res = await fetch(`${config.backendUrl}/_get_next.php?id=${old_id}&client=${config.clientName}`)
        const slide = await res.json()
        if (slide.file === "no active file") throw new Error("no active file")
        slide.file = `${config.backendUrl}/${slide.file}`
        return slide
    } catch (err) {
        return { file: "background.png", duration: config.timeout, error: err }
    }
}
