<?php

namespace App\Filament\Resources\Core;

use App\Filament\Resources\Core\WebsiteinfoResource\Pages;
use App\Filament\Resources\Core\WebsiteinfoResource\RelationManagers;
use App\Models\Core\Websiteinfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteinfoResource extends Resource
{
    protected static ?string $model = Websiteinfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'Website Information';

    protected static ?string $navigationGroup = 'Wbsite Information';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form 
            ->schema([
                Forms\Components\TextInput::make('website_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitter_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tiktok')
                    ->maxLength(255),
                Forms\Components\TextInput::make('linkedin_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('main_mail')
                    ->maxLength(255),
                Forms\Components\TextInput::make('second_mail')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('main_logo')
                    ->disk('public')
                    ->directory('core-images')
                    ->image()
                    ->imageEditor(),
                Forms\Components\FileUpload::make('admin_panel_logo')
                    ->disk('public')
                    ->directory('core-images')
                    ->image()
                    ->imageEditor(),
                Forms\Components\FileUpload::make('signup_logo')
                    ->disk('public')
                    ->directory('news-images')
                    ->image()
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('website_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tiktok')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('main_mail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('second_mail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('main_logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('admin_panel_logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('signup_logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebsiteinfos::route('/'),
            'create' => Pages\CreateWebsiteinfo::route('/create'),
            'view' => Pages\ViewWebsiteinfo::route('/{record}'),
            'edit' => Pages\EditWebsiteinfo::route('/{record}/edit'),
        ];
    }
}
