const config = {
    backendUrl: "http://webprogramozas.inf.elte.hu/hallgatok/dzhbcx/egyeb/ikijelzo/szerver",
    timeout: 60,
    clientName: localStorage.getItem("client-name") ?? "unnamed",
    delay: 0.6,
}

export default config
