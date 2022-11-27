const entries = getEntries();

document.addEventListener('DOMContentLoaded', function() {
    let bodyHtml = document.body.innerHTML;

    bodyHtml = replaceHtml(bodyHtml, entries);

    // need to replace one more time because after first replacement can be new IEMS tags
    bodyHtml = replaceHtml(bodyHtml, entries);

    document.body.innerHTML = bodyHtml;
});

function replaceHtml(bodyHtml, entries) {
    bodyHtml = bodyHtml.replace(/\[iems id=\d+\]/g, function(match) {
        let id = match.match(/\d+/)[0];
        for (let key in entries) {
            if (entries[key].id == id) {
                let entry = entries[key];
                let value = entry.value;

                // foreach translations
                for (let key in entry.translations) {
                    let translation = entry.translations[key];
                    if (key == IEMSURLS.locale) {
                        value = translation;
                    }
                }

                return value;
            }
        }
    });

    return bodyHtml;
}

function getEntries() {
    let entriesEndpoint = IEMSURLS.entries;

    // fetch entries from entries endpoint without promise
    let entries = [];
    let xhr = new XMLHttpRequest();
    xhr.open('GET', entriesEndpoint, false);
    xhr.onload = function() {
        if (xhr.status === 200) {
            entries = JSON.parse(xhr.responseText);
        }
    }
    xhr.send();

    return entries;
}