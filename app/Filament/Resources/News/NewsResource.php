<?php

namespace App\Filament\Resources\News;

use App\Filament\Resources\News\NewsResource\Pages;
use App\Filament\Resources\News\NewsResource\RelationManagers;
use App\Filament\Resources\News\NewsResource\RelationManagers\AuthorsRelationManager;
use App\Filament\Resources\News\NewsResource\RelationManagers\NewstagsRelationManager;
use App\Models\News\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'News';

    protected static ?string $navigationGroup = 'News';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('resume')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('header')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('section_1')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('section_2')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('conclusion')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('header_image')
                    ->disk('public')
                    ->directory('news-images')
                    ->image()
                    ->imageEditor(),
                Forms\Components\FileUpload::make('second_image')
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
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('header_image'),
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
            AuthorsRelationManager::class,
            NewstagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'view' => Pages\ViewNews::route('/{record}'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
