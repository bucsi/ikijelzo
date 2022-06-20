import config from './conf.js'

export default async function load(old_id){
    try{

        const res = await fetch(`${config.backendUrl}/_get_next.php?id=${old_id}`)
        const slide = await res.json()
        localStorage.setItem('slide', JSON.stringify(slide))
        console.log(slide)
        return slide
    }catch(err){
        console.log(err)
    }
}