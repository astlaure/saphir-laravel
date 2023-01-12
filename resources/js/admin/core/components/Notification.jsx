import React, { useEffect } from 'react';

export default function Notification({ notification, index, handleClose }) {
    useEffect(() => {
        setTimeout(() => {
            handleClose(index);
        }, 5000)
    }, [])

    return (
        <div className={`alert alert-${notification.type} alert-dismissible fade show text-capitalize`}>
            {notification.message}
            <button type="button" className="btn-close" aria-label="Close" onClick={() => handleClose(index)}></button>
        </div>
    );
}
