// ----------------tabs
// Show the first tab by default
$('.tabs-stage section').hide();
$('.tabs-stage section:first').show();
$('.tabs-nav li:first').addClass('tab-active');

// Change tab class and display content
$('.tabs-nav a').on('click', function (event) {
    event.preventDefault();
    $('.tabs-nav li').removeClass('tab-active');
    $(this).parent().addClass('tab-active');
    $('.tabs-stage section').hide();
    $($(this).attr('href')).show();
});
// ------------------------------------------show details
$('.items-row .item').click(function () {
    if ($(window).width() > 950) {

        let item = $(this)
        if (!$('.center-item').hasClass('active')) {
            $(".center-item").toggleClass('active');
            $(".center-item .item").removeClass('active');
            $(".items-row").removeClass('active');
            setTimeout(function () {
                item.toggleClass('active');
                $(".left-row").show();
                $("#detail-content").show();
                setDetailBoxSize()

            }, 400)
        } else {
            if (item.hasClass('active')) {
                $(".center-item").removeClass('active');
                $(".items-row").removeClass('active');
                item.removeClass('active');
                $(".left-row").hide();
                $("#detail-content").hide();
                setDetailBoxSize()
            } else {
                $(".center-item .item").removeClass('active');
                item.addClass('active')
            }


        }

    }

})

$(window).resize(function () {
    setDetailBoxSize()
});

function setDetailBoxSize() {

    let detailbox = $("body").find('#details-box')
    var viewportOffset = detailbox[0].getBoundingClientRect();

    var top = viewportOffset.top + 2;
    var left = viewportOffset.left + 1;

    let content = $('#detail-content')
    content.css('width', detailbox.width() - 2)
    content.css('height', detailbox.height() - 3)
    content.css('left', left)
    content.css('top', top + window.scrollY)

}

// -----------------------filter active class
$('.first-choose').click(function () {
    $(".first-choose").removeClass('active');
    $(this).toggleClass('active');
})
$('.second-choose').click(function () {
    $(".second-choose").removeClass('active');
    $(this).toggleClass('active');
})


/*Dropdown Menu*/


$('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
        $(this).find('.dropdown-menu').slideToggle(300);
    } else {
        $(this).find('.dropdown-menu').hide(20);
    }
});
$('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').hide(20);
});

$('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('span').text($(this).text());
    $(this).parents('.dropdown').find('span').css("color", "#323232")
    $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
});

/*End Dropdown Menu*/
// --------------------------filter
/*let filter_items = Array(
    "Project Senior Engineer",
    "Project Senior",
)*/
let selected_filter_items = Array()
$(document).ready(function () {
    initFilterList()
});

function initFilterList() {
    let container = $('#Position-Job ul')
    container.empty()
    if (typeof filter_items == "undefined")
        return;
    filter_items.forEach(function (filter) {
        if (!selected_filter_items.includes(filter)) {
            if (typeof filter == "object")
                container.append(`<li data-id="${filter.id}"><a data-id="${filter.id}">${filter.name}</a></li>`)
            else
                container.append(`<li><a>${filter}</a></li>`)

        }
    })

    $("#Position-Job ul li").click(function (element) {

        if (selected_filter_items.includes(element.target.innerText)) {
            return
        }
        selected_filter_items.push(element.target.innerText)
        initFilterList()

        $("#Position-tag-row").append(
            `<div class="tag-item"><img src="/assets/icon/cancel.svg">${element.target.innerText}</div>`
        ).hide().fadeIn(300);;


        console.log(element.target);
        if(element.target.hasAttribute('data-id')){
            $("#Position-tag-row").append(
                `<input name="Positions[]" value="${element.target.getAttribute('data-id')}" hidden />`
            );
        } else {
            var index_text_item = filter_items.indexOf(element.target.innerText);

            $("#Position-tag-row").append(
                `<input name="Positions[]" value="${filter_items_id[index_text_item]}" hidden />`
            );
        }

        $(".tag-item").click(function (element) {
            let index = selected_filter_items.indexOf($(this).text())

            if (index > -1) {
                selected_filter_items.splice(index, 1)
            }
            $(this).fadeOut(300, function () {
                console.log('fade out done')
                document.getElementsByName('Positions[]')[index].remove();
                $(this).remove();
                initFilterList()
            })
        });

    });

}

// ------------------------------


/*let Benefits_filter_items = Array(
    "Remote",
    "Paid Relocation",
    "Visa Sponsor",
    "Paid in Crypto",
)*/
let Benefits_selected_filter_items = Array()
$(document).ready(function () {
    Benefits_initFilterList()
});

function Benefits_initFilterList() {
    let container = $('#Benefits ul')
    container.empty()
    if (typeof Benefits_filter_items == "undefined")
        return;
    Benefits_filter_items.forEach(function (filter) {
        if (!Benefits_selected_filter_items.includes(filter)) {
            if (typeof filter == "object")
                container.append(`<li data-id="${filter.id}"><a data-id="${filter.id}">${filter.name}</a></li>`)
            else
                container.append(`<li><a>${filter}</a></li>`)
        }
    })


    $("#Benefits ul li").click(function (element) {

        if (Benefits_selected_filter_items.includes(element.target.innerText)) {
            return
        }
        Benefits_selected_filter_items.push(element.target.innerText)
        Benefits_initFilterList()

        $("#Benefits-tag-row").append(
            `<div class="tag-item"><img src="/assets/icon/cancel.svg">${element.target.innerText}</div>`
        ).hide().fadeIn(300);


        if(element.target.hasAttribute('data-id')){
            $("#Benefits-tag-row").append(
                `<input name="Benefits[]" value="${element.target.getAttribute('data-id')}" hidden />`
            );
        } else {
            var index_text_item = Benefits_filter_items.indexOf(element.target.innerText);

            $("#Benefits-tag-row").append(
                `<input name="Benefits[]" value="${Benefits_filter_items_id[index_text_item]}" hidden />`
            );
        }



        $(".tag-item").click(function (element) {
            console.log($(this).parent().text())
            let index = Benefits_selected_filter_items.indexOf($(this).text())
            if (index > -1) {
                Benefits_selected_filter_items.splice(index, 1)
            }
            $(this).fadeOut(300, function () {
                console.log('fade out done')
                $(this).remove();
                document.getElementsByName('Benefits[]')[index].remove();
                Benefits_initFilterList()
            })
        });

    });

}

// ------------------------
/*
let type_filter_items = Array(
    "Contractor",
    "Full-time",
    "Intern",
)*/
let type_selected_filter_items = Array()
$(document).ready(function () {
    type_initFilterList()
});

function type_initFilterList() {
    let container = $('#Type ul')
    container.empty()
    if (typeof type_filter_items == "undefined")
        return;
    type_filter_items.forEach(function (filter) {
        if (!type_selected_filter_items.includes(filter)) {
            if (typeof filter == "object")
                container.append(`<li data-id="${filter.id}"><a data-id="${filter.id}">${filter.name}</a></li>`)
            else
                container.append(`<li><a>${filter}</a></li>`)
        }
    })

    $("#Type ul li").click(function (element) {

        if (type_selected_filter_items.includes(element.target.innerText)) {
            return
        }
        type_selected_filter_items.push(element.target.innerText)
        type_initFilterList()

        $("#Type-tag-row").append(
            `<div class="tag-item"><img src="/assets/icon/cancel.svg">${element.target.innerText}</div>`
        ).hide().fadeIn(300);

        var index_text_item = type_filter_items.indexOf(element.target.innerText);

        if(element.target.hasAttribute('data-id')){
            $("#Type-tag-row").append(
                `<input name="types[]" value="${element.target.getAttribute('data-id')}" hidden />`
            );
        } else {
            $("#Type-tag-row").append(
                `<input name="types[]" value="${type_filter_items_id[index_text_item]}" hidden />`
            );
        }


        $(".tag-item").click(function (element) {
            console.log($(this).parent().text())
            let index = type_selected_filter_items.indexOf($(this).text())
            if (index > -1) {
                type_selected_filter_items.splice(index, 1)
            }
            $(this).fadeOut(300, function () {
                console.log('fade out done')
                $(this).remove();
                document.getElementsByName('types[]')[index].remove();
                type_initFilterList()
            })
        });

    });

}

//-------------------------
let category_selected_filter_items = Array()
$(document).ready(function () {
    category_initFilterList()
});

function category_initFilterList() {
    let container = $('#category ul')
    container.empty()
    if (typeof category_filter_items == "undefined")
        return;
    category_filter_items.forEach(function (filter) {
        if (!category_selected_filter_items.includes(filter)) {
            container.append(`<li><a>${filter}</a></li>`)
        }
    })

    $("#category ul li").click(function (element) {

        if (category_selected_filter_items.includes(element.target.innerText)) {
            return
        }
        category_selected_filter_items.push(element.target.innerText)
        category_initFilterList()

        $("#category-tag-row").append(
            `<div class="tag-item"><img src="/assets/icon/cancel.svg">${element.target.innerText}</div>`
        ).hide().fadeIn(300);
        var index_text_item = category_filter_items.indexOf(element.target.innerText);
        $("#category-tag-row").append(
            `<input name="categories[]" value="${category_filter_items_id[index_text_item]}" hidden />`
        );


        $(".tag-item").click(function (element) {
            console.log($(this).parent().text())
            let index = category_selected_filter_items.indexOf($(this).text())
            if (index > -1) {
                category_selected_filter_items.splice(index, 1)
            }
            $(this).fadeOut(300, function () {
                console.log('fade out done')
                $(this).remove();
                category_initFilterList()
            })
        });

    });

}

// -------------------------

let level_selected_filter_items = Array()
$(document).ready(function () {
    level_initFilterList()
});

function level_initFilterList() {
    let container = $('#level ul')
    container.empty()
    if (typeof level_filter_items == "undefined")
        return;
    level_filter_items.forEach(function (filter) {
        if (!level_selected_filter_items.includes(filter)) {
            container.append(`<li><a>${filter}</a></li>`)
        }
    })

    $("#level ul li").click(function (element) {

        if (level_selected_filter_items.includes(element.target.innerText)) {
            return
        }
        level_selected_filter_items.push(element.target.innerText)
        level_initFilterList()

        $("#level-tag-row").append(
            `<div class="tag-item"><img src="/assets/icon/cancel.svg">${element.target.innerText}</div>`
        ).hide().fadeIn(300);
        var index_text_item = level_filter_items.indexOf(element.target.innerText);
        $("#level-tag-row").append(
            `<input name="levels[]" value="${level_filter_items_id[index_text_item]}" hidden />`
        );


        $(".tag-item").click(function (element) {
            console.log($(this).parent().text())
            let index = level_selected_filter_items.indexOf($(this).text())
            if (index > -1) {
                level_selected_filter_items.splice(index, 1)
            }
            $(this).fadeOut(300, function () {
                console.log('fade out done')
                $(this).remove();
                level_initFilterList()
            })
        });

    });

}
