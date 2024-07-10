<?php

namespace App\Filament\Resources\Customers;

use App\Filament\Resources\Customers\SocialmedialinkResource\Pages;
use App\Filament\Resources\Customers\SocialmedialinkResource\RelationManagers;
use App\Models\Customers\Socialmedialink;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialmedialinkResource extends Resource
{
    protected static ?string $model = Socialmedialink::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'Social Links';
    
    protected static ?string $navigationGroup = 'Customers';
    
    protected static ?int $navigationSort = 3;
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('facebook_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitter_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp_url')
                    ->maxLength(255)
                    ->unique(),
                Forms\Components\TextInput::make('tiktok_url')
                    ->maxLength(255),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('facebook_url')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('instagram_url')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('twitter_url')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('whatsapp_url')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiktok_url')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListSocialmedialinks::route('/'),
            'create' => Pages\CreateSocialmedialink::route('/create'),
            'view' => Pages\ViewSocialmedialink::route('/{record}'),
            'edit' => Pages\EditSocialmedialink::route('/{record}/edit'),
        ];
    }
}
