// require('../../vendor/palette-color-picker');

import MediumEditor from 'medium-editor';
    
var BulletsList = MediumEditor.extensions.button.extend({
    name: "bulletslist",
    action: "getBulletsList",
    aria: "list bullets",
    contentDefault: '<b>&bull;</b>',
    contentFA: '<i class="fa fa-list-ul"></i>',
    
    handleClick: function(e) {
        e.preventDefault();
        e.stopPropagation();

        this.selectionState = this.base.exportSelection();

        // If no text selected, stop here.
        if(this.selectionState && (this.selectionState.end - this.selectionState.start === 0) ) {
            return;
        }

        // style for bullets in picker
        var bullets = [
        " ",
        "list-bullets-1",
        "list-bullets-2",
        "list-bullets-3",
        "list-bullets-4",
        "list-bullets-5",
        "list-bullets-6",
        "list-bullets-7",
        ];
        
        var mediumContainer = $(this.button).parent().parent().attr('id');
        
        if ($('[id='+mediumContainer+']').find('[name="bullets-input"]').length == 0){

            var inp = $('<input type="hidden" name="bullets-input">');

            $('[id='+mediumContainer+']').find('.medium-editor-action-bulletslist').after(inp);
        }

        var that = this;

        $('[name="bullets-input"]').paletteColorPicker({
            colors: bullets,
            clear_btn: 'last',
            insert: 'before',
            addclass: 'bullets',

            onbeforeshow_callback: function( what ) {
                // $('[data-target="bullets-input"]').children().removeClass('downside');
            },

            // Callback on change value
            onchange_callback: function( clicked_bullet ) {
                e.preventDefault();
                e.stopPropagation();
                
                that.base.importSelection(that.selectionState);
                
                window.meditor = that;
                
                if (clicked_bullet == '') {
                    that.clearBullets();
                    return;
                }

                let parentEl = that.getParentEl();
                
                if (parentEl.nodeName !== 'UL') {
                    that.document.execCommand('insertUnorderedList');      
                    parentEl = that.getParentEl();    
                }

                if (parentEl.nodeName == 'UL') {
                    $(parentEl).attr('class', clicked_bullet);
                }
            }
        });

        $('[data-target="bullets-input"]').trigger('click');

    },

    clearBullets: function () {
        if (this.getParentEl().localName == 'ul') {
            this.document.execCommand('insertUnorderedList');
        }
    },

    getParentEl: function () {
        let parentEl = this.base.getSelectedParentElement();
        while (parentEl.nodeName !== 'UL'){
            parentEl = parentEl.parentElement;
            if (parentEl.nodeName == 'DIV'){
                parentEl = parentEl.firstElementChild;
                break;   
            }
        }
        return parentEl;

    },
});

export default BulletsList;