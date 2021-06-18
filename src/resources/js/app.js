function removeWatermark(className, imageId, originalFilepath) {
    let existingWatermarks = document.querySelectorAll('.' + className);
    for (let wmark of existingWatermarks) {
        wmark.remove();
    }
    document.getElementById(imageId).src = originalFilepath;
}

function addWatermark(posX, posY, width, height, pageNumber, className) {
    let watermark = document.createElement('div');
    watermark.style.cssText = `position: absolute; left: ${posX}; top: ${posY}; width:${width}px; height: ${height}px; background: rgba(255, 0, 0, 0.5);z-index:100`;
    watermark.className = className;
    watermark.innerText = '';
    document.body.appendChild(watermark);
}

function addInputValue(posX, posY, pageNumber) {
    document.getElementById(`pos-x-${pageNumber}`).value = posX;
    document.getElementById(`pos-y-${pageNumber}`).value = posY;
}

document.addEventListener(
    "DOMContentLoaded",
    () => {
        let images = document.querySelectorAll('.image');

        for (let i=0; i < images.length; i++) {
            images[i].onclick = (e) => {
                const rect = e.target.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                removeWatermark(
                    'image-page-' + images[i].dataset.page,
                    images[i].id,
                    images[i].dataset.originalFilename
                );

                // 200px is the space above the first image (page heading + save button)
                addWatermark(
                    parseInt(e.clientX),
                    parseInt(e.clientY+window.pageYOffset),
                    310,
                    310,
                    images[i].dataset.page,
                    'image-page-' + images[i].dataset.page
                );

                addInputValue(
                    parseInt(x),
                    parseInt(y),
                    images[i].dataset.page
                )
            };
        }
    },
    false
);

