<?php

require_once 'HTMLPurifier/AttrDef/CSS.php';

class HTMLPurifier_AttrDef_CSSTest extends HTMLPurifier_AttrDefHarness
{
    
    function test() {
        
        $this->def = new HTMLPurifier_AttrDef_CSS();
        
        // regular cases, singular
        $this->assertDef('text-align:right;');
        $this->assertDef('border-left-style:solid;');
        $this->assertDef('border-style:solid dotted;');
        $this->assertDef('clear:right;');
        $this->assertDef('float:left;');
        $this->assertDef('font-style:italic;');
        $this->assertDef('font-variant:small-caps;');
        $this->assertDef('font-weight:bold;');
        $this->assertDef('list-style-position:outside;');
        $this->assertDef('list-style-type:upper-roman;');
        $this->assertDef('text-transform:capitalize;');
        $this->assertDef('background-color:rgb(0,0,255);');
        $this->assertDef('background-color:transparent;');
        $this->assertDef('color:#F00;');
        $this->assertDef('border-top-color:#F00;');
        $this->assertDef('border-color:#F00 #FF0;');
        $this->assertDef('border-top-width:thin;');
        $this->assertDef('border-top-width:12px;');
        $this->assertDef('border-width:5px 1px 4px 2px;');
        $this->assertDef('border-top-width:-12px;', false);
        $this->assertDef('letter-spacing:normal;');
        $this->assertDef('letter-spacing:2px;');
        $this->assertDef('word-spacing:normal;');
        $this->assertDef('word-spacing:3em;');
        $this->assertDef('font-size:200%;');
        $this->assertDef('font-size:larger;');
        $this->assertDef('font-size:12pt;');
        $this->assertDef('line-height:2;');
        $this->assertDef('line-height:2em;');
        $this->assertDef('line-height:20%;');
        $this->assertDef('line-height:normal;');
        $this->assertDef('line-height:-20%;', false);
        $this->assertDef('margin-left:5px;');
        $this->assertDef('margin-right:20%;');
        $this->assertDef('margin-top:auto;');
        $this->assertDef('margin:auto 5%;');
        $this->assertDef('padding-bottom:5px;');
        $this->assertDef('padding-top:20%;');
        $this->assertDef('padding:20% 10%;');
        $this->assertDef('padding-top:-20%;', false);
        $this->assertDef('text-indent:3em;');
        $this->assertDef('text-indent:5%;');
        $this->assertDef('text-indent:-3em;');
        $this->assertDef('width:50%;');
        $this->assertDef('width:50px;');
        $this->assertDef('width:auto;');
        $this->assertDef('width:-50px;', false);
        
        // duplicates
        $this->assertDef('text-align:right;text-align:left;',
                                          'text-align:left;');
        
        // a few composites
        $this->assertDef('font-variant:small-caps;font-weight:900;');
        $this->assertDef('float:right;text-align:right;');
        
        // selective removal
        $this->assertDef('text-transform:capitalize;destroy:it;',
                         'text-transform:capitalize;');
        
        // inherit works for everything
        $this->assertDef('text-align:inherit;');
        
        // bad props
        $this->assertDef('nodice:foobar;', false);
        $this->assertDef('position:absolute;', false);
        $this->assertDef('background-image:url(javascript:alert\(\));', false);
        
    }
    
}

?>