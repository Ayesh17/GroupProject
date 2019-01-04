$("#equipmentRequestForm").validate({
    rules:{
        item:{
            required: true,
        },
        quantity:{
            required: true
        },
        from:{
            required: true,
        },
        to:{
            required:true
        },
        date:{
            required:true,
        }

    },
    messages:{
        item:{
            required:"Choose a item",
        },
        quantity:{
            required:"Choose quantity"
        },
        from:{
            required:"Select a time "
        },
        to:{
            required:"Select a time "
        },
        date:{
            required:"Give a date for reservation"
        }
    }
});
