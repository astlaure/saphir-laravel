import { useEffect, useState } from 'react';
import axios from 'axios';

export default function useDataLoader(url, initial) {
    const [data, setData] = useState(initial);
    const [loading, setLoading] = useState(true);
    const [errors, setErrors] = useState(false);

    useEffect(() => {
        axios.get(url)
            .then(response => setData(response.data))
            .catch(() => setErrors(true))
            .finally(() => setLoading(false));
    }, []);

    return [data, loading, errors];
}
