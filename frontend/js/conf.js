const config = {
    backendUrl: 'http://localhost:3000',
    timeout: 60,
    clientName: localStorage.getItem("client-name") ?? "unnamed"
}

export default config