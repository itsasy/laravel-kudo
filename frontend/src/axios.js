import axios from 'axios'
import router from './router/router'
import store from './store/store'

const instance = axios.create({
    baseURL: 'https://laravel-kudoboard.test/api'
})


instance.interceptors.request.use((config) => {
    config.headers.common['Authorization'] = `Bearer ${localStorage.getItem('kudoboard_user_token')}`
    return config
}, (error) => Promise.reject(error))

instance.interceptors.response.use((response) => {
    return response
}, (error) => {
    if (error.response.status === 401) {
        store.commit({
            type: "logout"
        })
        localStorage.removeItem("kudoboard_user")
        localStorage.removeItem("kudoboard_user_token")
        router.push("/login")
    }
})


export default instance
