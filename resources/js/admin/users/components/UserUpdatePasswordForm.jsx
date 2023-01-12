import { useNavigate } from 'react-router-dom';
import React, { useState } from 'react';
import { useForm } from 'react-hook-form';
import axios from 'axios';
import classNames from 'classnames';
import { useTranslation } from 'react-i18next';

export default function UserUpdatePasswordForm({ user }) {
    const { t } = useTranslation();
    const navigate = useNavigate();
    const [errors, setErrors] = useState({});
    const { handleSubmit, register } = useForm({
        mode: 'onBlur',
        reValidateMode: 'onBlur',
        defaultValues: {
            password: '',
            password_confirmation: '',
        },
    });

    const onSubmit = handleSubmit(data => {
        axios.patch(`/users/${user.id}`, data)
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
                    <label htmlFor="password" className="form-label text-capitalize">{t('password')}</label>
                    <input type="password" id="password" className={classNames('form-control', { 'is-invalid': errors.password })} {...register('password')} />
                    { errors.password ? <div className="invalid-feedback">{errors.password[0]}</div> : null }
                </div>
                <div className="mb-4">
                    <label htmlFor="password_confirmation" className="form-label text-capitalize">{t('password confirmation')}</label>
                    <input type="password" id="password_confirmation" className={classNames('form-control', { 'is-invalid': errors.password_confirmation })} {...register('password_confirmation')} />
                    { errors.password_confirmation ? <div className="invalid-feedback">{errors.password_confirmation[0]}</div> : null }
                </div>
                <div className="d-flex justify-content-end">
                    <button type="submit" className="btn btn-primary px-4 text-capitalize">{t('save')}</button>
                </div>
            </form>
        </div>
    )
}
