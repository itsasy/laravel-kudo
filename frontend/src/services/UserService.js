import axios from '../axios'

export default class UserServices {
    registerUser(data) {
        return new Promise((resolve, reject) => {
            axios.post('/register', {
                name: data.name,
                email: data.email,
                password: data.password
            }).then(response => {
                resolve(response);
            }).catch(error => {
                reject(error)
            })
        })
    }
}
