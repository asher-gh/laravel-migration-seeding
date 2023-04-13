import './bootstrap';

// Load data from the api.
axios.get('/api/actors')
    .then(response => {
        const actors = response.data.data;
        console.log(actors);
    });
    
// Load data from a route that requires authorization
axios.get('/api/user')
    .then(response => {
        alert('OK');
    })
    .catch(response => {
        alert('FAILED!');
        debugger;
    });