(function ($) {

    var dataDate = $('#countdown').data('date');
    alert(dataDate);
    var countdown = {
        END_DATE: Date.parse(dataDate),
        END_DATE_MESSAGE: "",
        NOW: new Date(),

        count: 4,
        padding: 70,
        circleSize: 150,
        border: 2,
        update: 1000,

        circles: {
            Dias: {
                title: "DAYS",
                seconds: 86400000,
                max: 31,
                color: '#fbb040'
            },
            Horas: {
                title: "HOURS",
                seconds: 3600000,
                max: 24,
                color: '#ef4d46'
            },
            Minutos: {
                title: "MINUTES",
                seconds: 60000,
                max: 60,
                color: '#8dc63f'
            },
            Segundos: {
                title: "SECONDS",
                seconds: 1000,
                max: 60,
                color: '#e51672'
            }
        },

        init: function () {

            countdown.canvas = document.createElement('canvas');
            countdown.ctx = countdown.canvas.getContext('2d');

            countdown.size = {
                w: ((countdown.circleSize + countdown.border) * countdown.count + (countdown.padding * (countdown.count - 1))),
                h: (countdown.circleSize + countdown.border + countdown.padding * 5)
            };

            countdown.canvas.setAttribute('width', countdown.size.w);
            countdown.canvas.setAttribute('height', countdown.size.h);

            $("#countdown").append(countdown.canvas);

            countdown.ctx.textAlign = 'center';
            countdown.actualSize = countdown.circleSize + countdown.border;
            countdown.TIME_LEFT = new Date(countdown.END_DATE).getTime();

            var INTERVAL = setInterval(function () {
                var NOW = new Date();
                if (NOW < countdown.END_DATE) {
                    countdown.start();
                } else {
                    countdown.completed();
                }
            }, countdown.update);

        },

        start: function () {

            // this clears the redraw text issue after loading the intel font
            countdown.ctx.setTransform(1, 0, 0, 1, 0, 0);
            countdown.ctx.clearRect(0, 0, countdown.size.w, countdown.size.h);

            var idx = 0;

            countdown.time = (new Date().getTime()) - countdown.TIME_LEFT;

            for (var key in countdown.circles) {
                countdown.draw(idx++, key, countdown.circles[key], countdown.circles[key].color);
            }

        },

        draw: function (idx, label, circle, color) {

            var x, y, value,
                circleSeconds = circle.seconds;

            value = parseFloat(countdown.time / circleSeconds);
            countdown.time -= Math.round(parseInt(value)) * circleSeconds;

            value = Math.abs(value);

            x = (countdown.circleSize * .5 + countdown.border * .5);
            x += (idx * (countdown.circleSize + countdown.padding + countdown.border));
            y = countdown.circleSize * .5;
            y += countdown.border * .5;

            var degrees = 360 - (value / circle.max) * 360.0;
            var endAngle = degrees * (Math.PI / 180);

            countdown.ctx.save();

            countdown.ctx.translate(x, y);
            countdown.ctx.clearRect(countdown.actualSize * -0.5, countdown.actualSize * -0.5, countdown.actualSize, countdown.actualSize);

            // OUTLINE
            countdown.ctx.beginPath();
            countdown.ctx.strokeStyle = "rgba(123,123,123, 1)";
            countdown.ctx.arc(0, 0, countdown.circleSize / 2, 0, 2 * Math.PI, 2);
            countdown.ctx.lineWidth = countdown.border;
            countdown.ctx.stroke();

            // FILL
            countdown.ctx.beginPath();
            countdown.ctx.strokeStyle = color;
            countdown.ctx.arc(0, 0, countdown.circleSize / 2, 0, endAngle, 1);
            countdown.ctx.lineWidth = countdown.border;
            countdown.ctx.stroke();

            // TEXT COLOR
            countdown.ctx.fillStyle = "rgba(85,85,85,1)";
            //countdown.ctx.shadowBlur = 2;
            //countdown.ctx.shadowOffsetY=2;
            //countdown.ctx.shadowOffsetX=1;
            //countdown.ctx.shadowColor = "black";

            // COUNTDOWN TIME
            countdown.ctx.font = 'normal 50px Roboto';
            countdown.ctx.fillText(Math.floor(value), 0, 20);

            // DAYS, HOURS, MINUTES
            countdown.ctx.font = 'normal 32px Roboto';
            if (Math.floor(value) === 1) {
                countdown.ctx.fillText(label.substring(0, label.length - 1), 0, 140);
            } else {
                countdown.ctx.fillText(label, 0, 140);
            }

            countdown.ctx.restore();

        },

        completed: function () {

            countdown.ctx.setTransform(1, 0, 0, 1, 0, 0);
            countdown.ctx.clearRect(0, 0, countdown.size.w, countdown.size.h);

            var idx = 0;
            countdown.time = "0";

            for (var key in countdown.circles) {
                countdown.draw(idx++, key, countdown.circles[key], "#e6e6e6");
            }

            // countdown.ctx.setTransform(1, 0, 0, 1, 0, 0);
            // countdown.ctx.clearRect(0, 0, countdown.size.w, countdown.size.h);
            // countdown.canvas.setAttribute('height', 160);
            // countdown.ctx.font = 'bold 140px intel-clear-pro';
            // countdown.ctx.fillText(countdown.END_DATE_MESSAGE, 0, 150);

            // countdown.canvas.setAttribute('style', 'display: none;');

            countdown.ctx.save();

        }

    };

    countdown.init();

})(jQuery);