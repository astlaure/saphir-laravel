import React, { useState } from 'react';
import ConfirmationDialog from './ConfirmationDialog';
import { useTranslation } from 'react-i18next';

export default function DeleteAction({ handleDelete }) {
    const [open, setOpen] = useState(false);

    const { t } = useTranslation();

    const handleOk = () => {
        handleDelete();
        setOpen(false);
    }

    const handleCancel = () => {
        setOpen(false);
    }

    const handleClick = () => {
        setOpen(true);
    }

    return (
        <>
            <button type="button" className="btn btn-link text-danger text-decoration-none" onClick={handleClick}>{t('delete')}</button>
            {open ? <ConfirmationDialog message={t('delete element ?')} handleOk={handleOk} handleCancel={handleCancel} /> : null}
        </>
    );
}
