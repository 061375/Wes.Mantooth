<h2>Loader</h2>
<div class="left">
    <section id="init">
        <h3>init <span> -> {Void}</span></h3>
        <h4>creates and instance of an object and canvas, initializes it and returns an ID</h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    $t
                </td>
                <td>
                    Object
                </td>
                <td>
                    DOM node target to add loader to
                </td>
            </tr>
            <tr>
                <td>
                    i
                </td>
                <td>
                    Number
                </td>
                <td>
                    O.loader[i] loader image or text
                </td>
            </tr>
            <tr>
                <td>
                    c
                </td>
                <td>
                    String
                </td>
                <td>
                    a class overide
                </td>
            </tr>
            <tr>
                <td>
                    callback
                </td>
                <td>
                    Function
                </td>
                <td>
                    
                </td>
            </tr>
        </table>
    </section>
    <section id="load">
        <h3>load <span> -> {Void}</span></h3>
        <h4>loads MIME type assets <br /><span>.jpg, .gif, .png, .svg, .bmp, .js, .json, .txt, .css, .ogg, .mp3</span></h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    a
                </td>
                <td>
                    Object
                </td>
                <td>
                    list of assets to load
                </td>
            </tr>
            <tr>
                <td>
                    callback
                </td>
                <td>
                    Function
                </td>
                <td>
                    
                </td>
            </tr>
        </table>
    </section>
    <section id="complete">
        <h3>complete <span> -> {Void}</span></h3>
        <h4>removes asset loader animation</h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    callback
                </td>
                <td>
                    Function
                </td>
                <td>
                    
                </td>
            </tr>
        </table>
    </section>
    <section id="load_images">
        <h3>load_images <span> -> {Void}</span></h3>
        <h4>loads images and appends them to the assets object</h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    img
                </td>
                <td>
                    String
                </td>
                <td>
                    image path
                </td>
            </tr>
            <tr>
                <td>
                    key
                </td>
                <td>
                    String
                </td>
                <td>
                    object key to reference the image in the $w.assets object
                </td>
            </tr>
        </table>
    </section>
    <section id="load_audio">
        <h3>load_audio <span> -> {Void}</span></h3>
        <h4>loads audio files and appends them to the assets object</h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    au
                </td>
                <td>
                    String
                </td>
                <td>
                    image path
                </td>
            </tr>
            <tr>
                <td>
                    key
                </td>
                <td>
                    String
                </td>
                <td>
                    object key to reference the audio in the $w.assets object
                </td>
            </tr>
        </table>
    </section>
    <section id="load_link">
        <h3>load_link <span> -> {Boolean}</span></h3>
        <h4>
            appends the link tag, generally used for css
            <br />
            there is currently limited support for onload of stylesheets
            <br />
            and frankly, I don't think its that important...css loads pretty fast
            <br />
            and browsers pick up the rules on the fly.
        </h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    l
                </td>
                <td>
                    Object
                </td>
                <td>
                    <table>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Description
                            </th>
                        </tr>
                        <tr>
                            <td>
                                rel
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                link rel=""
                            </td>
                        </tr>
                        <tr>
                            <td>
                                href
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                path to target file
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    key
                </td>
                <td>
                    String
                </td>
                <td>
                    object key to reference the link in the $w.assets object
                </td>
            </tr>
        </table>
    </section>
    <section id="load_script">
        <h3>load_script <span> -> {Boolean}</span></h3>
        <h4>
            this does not currently contain an onload for external libraries
            <br />
            either load them with the script tag as normal or check if the
            <br />
            class/function etc exists in your own code
        </h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    l
                </td>
                <td>
                    Object
                </td>
                <td>
                    <table>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Description
                            </th>
                        </tr>
                        <tr>
                            <td>
                                src
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                path to file
                            </td>
                        </tr>
                        <tr>
                            <td>
                                type
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                file type
                            </td>
                        </tr>
                        <tr>
                            <td>
                                integrity
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                crossorigin
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    key
                </td>
                <td>
                    String
                </td>
                <td>
                    object key to reference the script in the $w.assets object
                </td>
            </tr>
        </table>
    </section>
    <section id="set_error">
        <h3>set_error <span> -> {Void}</span></h3>
        <h4>sets an error message in a local array</h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    e
                </td>
                <td>
                    String
                </td>
                <td>
                    the error message
                </td>
            </tr>
        </table>
    </section>
    <section id="has_error">
        <h3>has_error <span> -> {Boolean}</span></h3>
        <h4>if the local variable error has errors they will be dumped to the console if logs are on</h4>
    </section>
    <section id="setO_val">
        <h3>setO_val <span> -> {Void}</span></h3>
        <h4>sets the local object O[k] with value v</h4>
        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Description
                </th>
            </tr>
            <tr>
                <td>
                    k
                </td>
                <td>
                    String
                </td>
                <td>
                    object key
                </td>
            </tr>
            <tr>
                <td>
                    v
                </td>
                <td>
                    Mixed
                </td>
                <td>
                    value
                </td>
            </tr>
        </table>
    </section>
</div>
<div class="right">
    <ul>
        <li>
            <a href="#init">init</a>
        </li>
        <li>
            <a href="#load">load</a>
        </li>
        <li>
            <a href="#complete">complete</a>
        </li>
        <li>
            <a href="#load_images">load_images</a>
        </li>
        <li>
            <a href="#load_audio">load_audio</a>
        </li>
        <li>
            <a href="#load_link">load_link</a>
        </li>
        <li>
            <a href="#load_script">load_script</a>
        </li>
        <li>
            <a href="#set_error">set_error</a>
        </li>
        <li>
            <a href="#has_error">has_error</a>
        </li>
        <li>
            <a href="#setO_val">setO_val</a>
        </li>
    </ul>
</div>