<?php 
        

        
        
        if( $columns = get_field('columns') ){
            
            foreach( $columns as $column ){
                
                // single
                if( $column['acf_fc_layout'] == 'single_column'):;?>
                
                    <div uk-grid>
                        <div class="uk-width-1-2 uk-align-center">
                            <?php echo $column['content'] ;?>
                        </div>
                    </div>
                <?php endif;?>
                
                
                <?php 
                // single full width
                if( $column['acf_fc_layout'] == 'single_column_full_width'):;?>
                    <div uk-grid>
                        <div class="uk-align-center  uk-width-1-1">
                            <?php echo $column['content'] ;?>
                        </div>
                    </div>
                <?php endif ;?>
                
                
              
                
                <?php 
                // double
                if( $column['acf_fc_layout'] == 'double_columns'):;?>
                    <div uk-grid>
                        <div class="uk-width-1-2@m">
                            <?php echo $column['col1'] ;?>
                        </div>
                        
                        <div class="uk-width-1-2@m">
                            <?php echo $column['col2'] ;?>
                        </div>
                    </div>
                <?php endif ;?>
                
                
                <?php 
                // double specifications
                if( $column['acf_fc_layout'] == 'specifications'):;?>
                    <div uk-grid>
                        <?php echo $column['col1'] ;?>
                        
                        <?php echo $column['col2'] ;?>
                    </div>

                <?php endif ;?>
                
                
                
                
                
                <?php                   
                // triple
                if( $column['acf_fc_layout'] == 'triple_columns'):;?>
                    <div uk-grid>
                        <div class="uk-width-1-3@m">
                            <?php echo $column['col1'] ;?>
                        </div>
                        <div class="uk-width-1-3@m">
                            <?php echo $column['col2'] ;?>
                        </div>
                        <div class="uk-width-1-3@m">
                            <?php echo $column['col3'] ;?>
                        </div>
                    </div>
                
                <?php endif ;?>
                    
                
                <?php 
                // quad
                if( $column['acf_fc_layout'] == 'quad_columns'):;?>
                    <div uk-grid>
                        <div class="uk-width-1-4@m">
                            <?php echo $column['col1'] ;?>
                        </div>
                        <div class="uk-width-1-4@m">
                            <?php echo $column['col2'] ;?>
                        </div>
                        <div class="uk-width-1-4@m">
                            <?php echo $column['col3'] ;?>
                        </div>
                        <div class="uk-width-1-4@m">
                            <?php echo $column['col4'] ;?>
                        </div>                
                    </div>
                
                <?php endif ;?>
                
                
                
                
                
            <?php 
            }
            
        };?>    
    

