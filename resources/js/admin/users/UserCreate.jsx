import React, { useState } from 'react';
import { useForm } from 'react-hook-form';
import axios from 'axios';
import { Link, useNavigate } from 'react-router-dom';
import classNames from 'classnames';

export default function UserCreate() {
    const navigate = useNavigate();
    const [errors, setErrors] = useState({});
    const { handleSubmit, register } = useForm({
        mode: 'onBlur',
        reValidateMode: 'onBlur',
        defaultValues: {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            role: 'client',
            enabled: true,
        },
    });

    const onSubmit = handleSubmit(data => {
        axios.post('/users', data)
            .then(() => {
                window.dispatchEvent(new CustomEvent('submit-notification', {
                    detail: { type: 'success', message: 'User created.' }
                }));
                navigate('/users');
            })
            .catch(err => {
                if (err.response.status === 422) {
                    setErrors(err.response.data.errors);
                }
            });
    });

    return (
        <div className="container">
            <div className="card border-0 shadow mt-4 mw-50e mx-auto">
                <div className="card-body">
                    <form action="#" onSubmit={onSubmit}>
                        <div className="mb-4">
                            <label htmlFor="name" className="form-label">Name</label>
                            <input type="text" id="name" className={classNames('form-control', { 'is-invalid': errors.name })} {...register('name')} />
                            { errors.name ? <div className="invalid-feedback">{errors.name[0]}</div> : null }
                        </div>
                        <div className="mb-4">
                            <label htmlFor="email" className="form-label">Email</label>
                            <input type="email" id="email" className={classNames('form-control', { 'is-invalid': errors.email })} {...register('email')} />
                            { errors.email ? <div className="invalid-feedback">{errors.email[0]}</div> : null }
                        </div>
                        <div className="mb-4">
                            <label htmlFor="password" className="form-label">Password</label>
                            <input type="password" id="password" className={classNames('form-control', { 'is-invalid': errors.password })} {...register('password')} />
                            { errors.password ? <div className="invalid-feedback">{errors.password[0]}</div> : null }
                        </div>
                        <div className="mb-4">
                            <label htmlFor="password_confirmation" className="form-label">Password Confirmation</label>
                            <input type="password" id="password_confirmation" className={classNames('form-control', { 'is-invalid': errors.password_confirmation })} {...register('password_confirmation')} />
                            { errors.password_confirmation ? <div className="invalid-feedback">{errors.password_confirmation[0]}</div> : null }
                        </div>
                        <div className="mb-4">
                            <label htmlFor="role" className="form-label">Role</label>
                            <select id="role" className={classNames('form-select', { 'is-invalid': errors.role })} {...register('role')}>
                                <option value="admin">Admin</option>
                                <option value="client">Client</option>
                            </select>
                            { errors.role ? <div className="invalid-feedback">{errors.role[0]}</div> : null }
                        </div>
                        <div className="mb-4 form-check">
                            <input type="checkbox" id="enabled" className={classNames('form-check-input', { 'is-invalid': errors.enabled })} {...register('enabled')} />
                            <label htmlFor="enabled" className="form-check-label">Enabled</label>
                            { errors.enabled ? <div className="invalid-feedback">{errors.enabled[0]}</div> : null }
                        </div>
                        <div className="d-flex justify-content-end">
                            <Link to="/users" className="btn btn-link">Back to users</Link>
                            <button type="submit" className="btn btn-primary px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}
