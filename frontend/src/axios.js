import axios from 'axios'

const instance = axios.create({
    baseURL: 'https://laravel-kudoboard.test/api'
})

export default instance
