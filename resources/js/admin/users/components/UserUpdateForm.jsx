import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useForm } from 'react-hook-form';
import axios from 'axios';
import classNames from 'classnames';
import { useTranslation } from 'react-i18next';

export default function UserUpdateForm({ user }) {
    const { t } = useTranslation();
    const navigate = useNavigate();
    const [errors, setErrors] = useState({});
    const { handleSubmit, register } = useForm({
        mode: 'onBlur',
        reValidateMode: 'onBlur',
        defaultValues: {
            name: user.name,
            email: user.email,
            role: user.role,
            enabled: user.enabled,
        },
    });

    const onSubmit = handleSubmit(data => {
        axios.put(`/users/${user.id}`, data)
            .then(() => {
                window.dispatchEvent(new CustomEvent('submit-notification', {
                    detail: { type: 'success', message: t('element updated') }
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
            <form action="#" onSubmit={onSubmit}>
                <div className="mb-4">
                    <label htmlFor="name" className="form-label text-capitalize">{t('name')}</label>
                    <input type="text" id="name" className={classNames('form-control', { 'is-invalid': errors.name })} {...register('name')} />
                    { errors.name ? <div className="invalid-feedback">{errors.name[0]}</div> : null }
                </div>
                <div className="mb-4">
                    <label htmlFor="email" className="form-label text-capitalize">{t('email')}</label>
                    <input type="email" id="email" className={classNames('form-control', { 'is-invalid': errors.email })} {...register('email')} />
                    { errors.email ? <div className="invalid-feedback">{errors.email[0]}</div> : null }
                </div>
                <div className="mb-4">
                    <label htmlFor="role" className="form-label text-capitalize">{t('role')}</label>
                    <select id="role" className={classNames('form-select', { 'is-invalid': errors.role })} {...register('role')}>
                        <option value="admin">{t('admin')}</option>
                        <option value="client">{t('client')}</option>
                    </select>
                    { errors.role ? <div className="invalid-feedback">{errors.role[0]}</div> : null }
                </div>
                <div className="mb-4 form-check">
                    <input type="checkbox" id="enabled" className={classNames('form-check-input', { 'is-invalid': errors.enabled })} {...register('enabled')} />
                    <label htmlFor="enabled" className="form-check-label text-capitalize">{t('enabled')}</label>
                    { errors.enabled ? <div className="invalid-feedback">{errors.enabled[0]}</div> : null }
                </div>
                <div className="d-flex justify-content-end">
                    <Link to="/users" className="btn btn-link text-capitalize">{t('back')}</Link>
                    <button type="submit" className="btn btn-primary px-4 text-capitalize">{t('save')}</button>
                </div>
            </form>
        </div>
    );
}
