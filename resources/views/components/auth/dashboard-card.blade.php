<script>
        
    function prevSection(sectionNumber) {
        var currentSection = $('#createSec' + sectionNumber);
        var prevSectionNumber = sectionNumber - 1;
        var prevSection = $('#createSec' + prevSectionNumber);

        currentSection.animate({
            width: '0'
        }, 300, function() {
            currentSection.hide();
            prevSection.animate({
            width: '100%'
            }, 300).show();
        });
    }
    function nextSection(sectionNumber) {
        var currentSection = $('#createSec' + sectionNumber);
        var nextSectionNumber = sectionNumber + 1;
        var nextSection = $('#createSec' + nextSectionNumber);

        currentSection.animate({
            width: '0'
        }, 300, function() {
            currentSection.hide();
            nextSection.animate({
            width: '100%'
            }, 300).show();
        });
    }
</script>
<div class="pxp-dashboard-content-details">

    {{ $slot }}

</div>