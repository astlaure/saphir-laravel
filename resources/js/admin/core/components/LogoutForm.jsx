import React from 'react';
import axios from 'axios';

export default function LogoutForm() {
    const handleSubmit = (event) => {
        event.preventDefault();
        axios.post('/logout', {}, { baseURL: '/' })
            .then(response => window.location.href = response.data.redirect)
            .catch(() => {});
    }
    return (
        <form action="#" onSubmit={handleSubmit}>
            <button type="submit" className="btn btn-link nav-link text-white">Logout</button>
        </form>
    );
}
