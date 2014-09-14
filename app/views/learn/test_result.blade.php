@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Probetest - Auswertung</h3>
            <?php
                $correct = 0;
                $wrong = 0;

                $language = array();
                foreach($_POST['language'] as $item){
                    array_push($language, $item);
                }
                $language = array_reverse($language);

                $input = array();
                foreach($_POST['input'] as $item){
                    array_push($input, $item);
                }
                $input = array_reverse($input);

                $groups = Auth::user()->groups;
                $counter = 0;
                foreach($groups as $group) {
                    foreach($group->words as $word)
                    {
                            if(array_pop($language) == 'ger'){
                                $inputTmp = array_pop($input);
                                if(JsonController::correctInput($inputTmp,$word->german)){
                                    $correct++; 
                                }else{   
                                    $wrong++;
                                }
                            }else{
                                $inputTmp = array_pop($input);
                                if(JsonController::correctInput($inputTmp,$word->english)){
                                    $correct++; 
                                }else{   
                                    $wrong++;
                                }
                            }
                            
                        $counter++;
                    }

                    
                }
                echo "Du hast ".$correct." von ".($correct+$wrong)." Wörtern richtig! Das sind ".round((($correct / ($correct+$wrong))*100),2)."%!";
                echo '<div class="ui blue progress">
                        <div class="bar" style="width: '.(($correct / ($correct+$wrong))*100).'%;">
                        </div>
                    </div>';

                    $correct = 0;
                $wrong = 0;

                $language = array();
                foreach($_POST['language'] as $item){
                    array_push($language, $item);
                }
                $language = array_reverse($language);

                $input = array();
                foreach($_POST['input'] as $item){
                    array_push($input, $item);
                }
                $input = array_reverse($input);

                $groups = Auth::user()->groups;
                $counter = 0;
                foreach($groups as $group) {
                    echo '<table class="ui celled table segment">
                            <thead>
                                <tr>
                                    <th>Deutsch</th>
                                    <th>English</th>
                                </tr>   
                            </thead>
                            <tbody>';
                    echo "<hr />";
                    echo "<h5>".$group->name."</h5>";
                    foreach($group->words as $word)
                    {
                        echo "<tr>";
                            if(array_pop($language) == 'ger'){
                                $inputTmp = array_pop($input);
                                if(JsonController::correctInput($inputTmp,$word->german) == 0){
                                    echo "<td><font color='green'>".$inputTmp."</font></td>";   
                                    $correct++; 
                                }else{
                                    echo "<td><font color='red'>".$inputTmp."</font></td>";    
                                    $wrong++;
                                }
                                
                                echo "<td>".$word->english."</td>";
                            }else{
                                echo "<td>".$word->german."</td>";

                                $inputTmp = array_pop($input);
                                if(JsonController::correctInput($inputTmp,$word->english)){
                                    echo "<td><font color='green'>".$inputTmp."</font></td>";   
                                    $correct++; 
                                }else{
                                    echo "<td><font color='red'>".$inputTmp."</font></td>";    
                                    $wrong++;
                                }
                            }
                            
                        $counter++;
                            

                        echo "</tr>";
                    }

                    echo "</tbody></table>";

                    
                }


            ?>

        </div>
    </div>
</div>
@stop