const btnComment = document.querySelector("#send-comment");

const result = document.querySelector('#result');

btnComment.addEventListener('click', function () {
    const commentContent = document.querySelector('#message').value;
    const productID = document.querySelector('#product_id').value;
    const userID = document.querySelector('#user_id').value;
    const link_image = document.querySelector('#link_image').value;
    const author = document.querySelector('#author').value;
    const email = document.querySelector('#email').value;
    addComment(commentContent, productID, userID, link_image, author, email);
});




async function addComment(commentContent, productID, userID, link_image, author, email) {

    // url sẽ xử lý phía server
    const url = 'index.php?controller=comment&action=index';

    // Chuyển data nhận vào thành kiểu Object để parse sang JSON
    const data = { productID: productID, commentContent: commentContent, userID: userID, link_image: link_image, author: author, email: email };

    // Gửi request
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    });

    // chuyển dữ liệu trả về theo kiểu JSON
    const comments = await response.json();

    // Khai báo Html sẽ được render
    let commentsResult = ""; // clear
    // Khai báo Html sẽ được render
    comments.forEach(item => {

        commentsResult += `
        <li>
        <div class="comment">
            <div class="img-thumbnail">
                <image style="max-width: 80px;" alt=""
                    src="public/upload/images/${item['link_image']}">
                </image>
            </div>
            <div class="comment-block">
                <div class="comment-arrow"></div>
                <span class="comment-by">
                    <strong>${item['author']}</strong>
                </span>
                <p>${item['content']}</p>
            </div>
        </div>
    </li>`;

    });
    // Đẩy html được render vào
    result.innerHTML = commentsResult;
}