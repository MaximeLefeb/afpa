import axios from "axios";

export async function get() {
    return await axios.get("http://localhost:3000/posts/").then((response) => {
        return response.data;
    });
}

export async function getBy(id) {
    return await axios.get(`http://localhost:3000/posts/${id}`).then((response) => {
        return response.data;
    });
}

export async function post(form) {
    return await axios.post(`http://localhost:3000/posts/`, form).then((response) => {
        return response.data;
    });
}

export async function deleteBy (id) {
    return await axios.delete(`http://localhost:3000/posts/${id}`).then((response) => {
        return response.data;
    });
}