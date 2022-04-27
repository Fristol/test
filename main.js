async function get() {
    let url = await fetch('http://localhost/redis/api/redis');
    let res = await url.json();
    document.querySelector('.list').innerHTML = '';
    if (res.status === true) {
        for (const [key, value] of Object.entries(res.data)) {
            document.querySelector('.list').innerHTML +=
                `<li>${key}: ${value} <a href="#" class="remove" onclick="remove('${key}')">delete</a></li>`;
        }
    }
}

async function remove(key) {
    let url = await fetch(`http://localhost/redis/api/redis/${key}`, {
        method: "DELETE"
    });
    let res = await url.json();
    if (res.status === true) {
        await get();
    }
}

get();