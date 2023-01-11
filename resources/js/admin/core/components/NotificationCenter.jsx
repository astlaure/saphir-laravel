import React, { useEffect, useState } from 'react';
import Notification from './Notification';

export default function NotificationCenter() {
    const [notifications, setNotifications] = useState([]);

    const handleNotification = (event) => {
        setNotifications(state => {
            return [...state, event.detail];
        });
    };

    useEffect(() => {
        window.addEventListener('submit-notification', handleNotification);

        return () => {
            window.removeEventListener('submit-notification', handleNotification);
        };
    }, []);

    const handleClose = (index) => {
        setNotifications(state => {
            const result = [...state];
            result.splice(index, 1);
            return result;
        });
    }

    return (
        <div className="notification-center">
            {notifications.map((notification, index) => {
                return (
                    <Notification index={index} notification={notification} handleClose={handleClose} />
                );
            })}
        </div>
    );
}
