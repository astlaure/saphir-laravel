import { useEffect, useState } from 'react';
import axios from 'axios';

export default function usePageDataLoader(url, initial) {
    const [page, setPage] = useState({
        current: 1,
        next: null,
        previous: null,
        data: initial,
    });
    const [loading, setLoading] = useState(true);
    const [errors, setErrors] = useState(false);

    const handler = () => {
        axios.get(url)
            .then(response => {
                const { current_page, data, next_page_url, prev_page_url } = response.data;
                setPage({
                    current: current_page,
                    next: next_page_url,
                    previous: prev_page_url,
                    data,
                });
            })
            .catch(() => setErrors(true))
            .finally(() => setLoading(false));
    }

    useEffect(() => {
        handler();
    }, [url]);

    return [page, loading, errors, handler];
}
