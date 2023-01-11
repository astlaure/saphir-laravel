import React, { useState } from 'react';
import ConfirmationDialog from './ConfirmationDialog';

export default function DeleteAction({ handleDelete }) {
    const [open, setOpen] = useState(false);

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
            <button type="button" className="btn btn-link text-danger text-decoration-none" onClick={handleClick}>delete</button>
            {open ? <ConfirmationDialog message="Delete the element?" handleOk={handleOk} handleCancel={handleCancel} /> : null}
        </>
    );
}
